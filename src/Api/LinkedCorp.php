<?php
/**
 * LinkedCorp.php
 * 互联企业相关接口
 * @author Deepseath
 * @version $Id$
 */
namespace WeWork\Api;

use WeWork\Traits\HttpClientTrait;

class LinkedCorp
{
    use HttpClientTrait;

    /**
     * 获取应用的可见范围
     * @return array
     */
    public function getAgentPermList(): array
    {
        return $this->httpClient->postJson('linkedcorp/agent/get_perm_list', []);
    }

    /**
     * 获取互联企业成员详细信息
     *
     * @param string $userid
     * @return array
     */
    public function getUser(string $userid): array
    {
        return $this->httpClient->postJson('linkedcorp/user/get', [
            'userid' => $userid
        ]);
    }

    /**
     * 获取互联企业部门成员
     * @param string $departmentId  部门id
     * @param bool $fetchChild  是否递归获取子部门下面的成员。1=递归获取
     * @return array
     */
    public function listSimpleUser(string $departmentId, bool $fetchChild = true): array
    {
        $data = [
            'department_id' => $departmentId,
            'fetch_child' => $fetchChild
        ];
        return $this->httpClient->postJson('linkedcorp/user/simplelist', $data);
    }

    /**
     * 获取互联企业部门成员详情
     * @param string $departmentId  互联企业部门id
     * @param bool $fetchChild 是否递归获取子部门下面的成员。1=递归获取
     * @return array
     */
    public function listUser(string $departmentId, bool $fetchChild = true): array
    {
        $data = [
            'department_id' => $departmentId,
            'fetch_child' => $fetchChild
        ];
        return $this->httpClient->postJson('linkedcorp/user/list', $data);
    }

    /**
     * 获取互联企业部门列表
     * @param unknown $departmentId
     * @return array
     */
    public function listDepartment(string $departmentId): array
    {
        return $this->httpClient->postJson('linkedcorp/department/list', [
            'department_id' => $departmentId
        ]);
    }
}
