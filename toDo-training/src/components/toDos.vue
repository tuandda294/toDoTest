<template>
  <div class="row todo-content">
    <div class="col-md-6">
      <div class="todo-list not-done">
        <h1>Ứng dụng toDo List</h1>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Thêm nội dung" v-model="textContent">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2" @click="addTask()">Thêm</button>
          </div>
        </div>
        <hr>
        <ul class="list-unstyled" v-for="(todo, index) in todos" :key="todo.id">
          <li class="ui-state-default li-items mt-1">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" aria-label="Radio button for following text input" :checked="todo.checked" v-model="todo.checked">
                </div>
              </div>
              <input type="text" class="form-control" v-bind:class="{ 'done-task': todo.completed}" v-model="todo.content">
              <div class="input-group-append remove-icon">
                <span class="input-group-text" @click="delTask(index)">&#10060;</span>
              </div>
            </div>
          </li>
        </ul>
        <hr>
        <div class="todo-footer row">
          <div class="col-md-6">
            <div class="form-check form-check-inline" @click="checkAll(true)">
              &#9989;
              <label class="form-check-label" for="inlineRadio1">Chọn</label>
            </div>
            <div class="form-check form-check-inline" @click="checkAll(false)">
              &#10062;
              <label class="form-check-label" for="inlineRadio2">Hủy</label>
            </div>
          </div>
          <div class="col-md-6 save-all">
            <div class="form-check form-check-inline save-all">
              <button type="button" class="btn btn-success btn-sm" @click="doneAll()">Hoàn thành &#10004;</button>
            </div>
            <div class="form-check form-check-inline save-all">
              <button type="button" class="btn btn-dark btn-sm" @click="deleteAll()">Xóa &#10006;</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'toDos',
  data: function () {
    return {
      todos: [
        {
          'id': 1,
          'content': 'Nội dung 1',
          'checked': false,
          'completed': false
        }, {
          'id': 2,
          'content': 'Nội dung 2',
          'checked': false,
          'completed': false
        }, {
          'id': 3,
          'content': 'Nội dung 3',
          'checked': false,
          'completed': false
        }, {
          'id': 4,
          'content': 'Nội dung 4',
          'checked': false,
          'completed': false
        }
      ],
      textContent: '',
      code: '2'
    }
  },
  methods: {
    // Ham them task
    addTask: function () {
      if (this.textContent.trim().length === 0) {
        return
      }
      this.code++
      this.todos.push(
        {
          'id': this.code,
          'content': this.textContent,
          'checked': false,
          'completed': false
        }
      )
      this.textContent = ''
    },
    // Ham xoa task
    delTask: function (index) {
      if (confirm('Bạn có chắc chắn muốn xóa nội dung này ?')) {
        this.todos.splice(index, 1)
      }
    },
    // Ham kiem tra chon tat ca
    checkAll: function (choose) {
      this.todos.forEach(todo => {
        todo.checked = choose
      })
    },
    // Ham hoan thanh tat ca
    doneAll: function () {
      if (confirm('Bạn chắc chắn đã hoàn thành các nội dung ?')) {
        this.todos.filter(function (item) {
          if (item.checked) {
            item.completed = true
          }
        })
        this.checkAll()
      }
    },
    // Ham xoa cac muc da chon
    deleteAll: function () {
      if (confirm('Bạn có chắc chắn muốn xóa các mục đã chọn ?')) {
        this.todos = this.todos.filter(function (item) {
          return !item.checked
        })
      }
    }
  }
}
</script>

<!-- Css style -->

<style scoped>
  .todo-content {
    display: flex;
    justify-content: center;
  }

  .todo-list h1 {
    margin-top: 20px;
    padding-bottom: 20px;
    text-align: center;
    font-weight: bold;
  }

  .todo-footer {
    background-color: #d2e8ca;
    padding: 10px 20px 15px;
  }

  #done-items li {
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
    text-decoration: line-through;
  }

  .done-task {
    text-decoration: line-through;
    color: orange;
  }

  .form-check-inline {
    cursor: pointer;
  }

  .remove-icon span {
    cursor: pointer;
  }

  .save-all {
    float: right;
  }
</style>
